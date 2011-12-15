valil = window.valil || {};
valil.chess = valil.chess || {};

valil.chess.board = {};
valil.chess.board.create = function (mainCanvas, dragCanvas) {
    g_timeout = 1000;

    var preferredSize = valil.chess.board.getPreferredSize();
    mainCanvas.width = mainCanvas.height = preferredSize;
    dragCanvas.width = dragCanvas.height = (preferredSize >> 3);

    var board = Object.create(valil.chess.board.prototype, {
        mainCtx: {value: mainCanvas.getContext('2d')},
        dragCtx: {value: dragCanvas.getContext('2d')},
        moveEvent: {value: valil.utils.event.create()},
        // TODO: This causes error in Chrome 8.0, this.startSq/this.delta cannot be set anymore
        /*
         startSq: {value: undefined},
         delta: {value: undefined},
         inputScale: {value: undefined},
         */
        displayScale: {value: preferredSize / (valil.chess.draw.squareSize << 3)}
    });

    Object.defineProperties(board, {
        boundAiMove: {value: board.aiMove.bind(board)},
        searchMove: {value: function() {
            Search(board.boundAiMove, 99, null);
        }}
    });

    var dragdrop = valil.utils.dragdrop.create(mainCanvas);
    dragdrop.startDrag.subscribe(board, board.startDrag);
    dragdrop.drag.subscribe(board, board.drag);
    dragdrop.endDrag.subscribe(board, board.endDrag);
    dragdrop.startListening();

    return board;
};
valil.chess.board.prototype = {
    draw: function() {
        for (var y = 0; y < 8; y++) {
            for (var x = 0; x < 8; x++) {
                this.mainCtx.save();
                var c = this.getSquareCoords(x, y);
                this.mainCtx.scale(this.displayScale, this.displayScale);
                this.mainCtx.translate(c.x, c.y);
                valil.chess.board.drawSquare(this.mainCtx, x, y);
                valil.chess.board.drawPiece(this.mainCtx, valil.chess.board.getPiece(x, y));
                this.mainCtx.restore();
            }
        }
    },
    startDrag: function(dragdropargs) {
        this.inputScale = this.getStyleSize();

        this.startSq = this.getSquare(dragdropargs);
        this.delta = this.getDelta(dragdropargs);
        var start = this.getSquareCoords(this.startSq.x, this.startSq.y);
        var piece = valil.chess.board.getPiece(this.startSq.x, this.startSq.y);

        if ((piece & 0x7) !== pieceEmpty) {
            this.mainCtx.save();
            this.mainCtx.scale(this.displayScale, this.displayScale);
            this.mainCtx.translate(start.x, start.y);
            valil.chess.board.drawSquare(this.mainCtx, this.startSq.x, this.startSq.y);
            this.mainCtx.restore();

            this.dragCtx.canvas.style.visibility = 'visible';
            this.dragCtx.canvas.style.left = (start.x * this.inputScale) + "px";
            this.dragCtx.canvas.style.top = (start.y * this.inputScale) + "px";

            this.dragCtx.save();
            this.dragCtx.scale(this.displayScale, this.displayScale);
            valil.chess.board.drawPiece(this.dragCtx, piece);
            this.dragCtx.restore();
        } else {
            dragdropargs.cancelled = true;
        }
    },
    drag: function(dragdropargs) {
        this.dragCtx.canvas.style.left = (dragdropargs.x - this.delta.x) + "px";
        this.dragCtx.canvas.style.top = (dragdropargs.y - this.delta.y) + "px";
    },
    endDrag: function(dragdropargs) {
        var endSq = this.getSquare(dragdropargs);
        var end = this.getSquareCoords(endSq.x, endSq.y);

        var move = valil.chess.board.getMove(this.startSq, endSq);
        if (move) {
            this.moveEvent.fire({move:GetMoveSAN(move)});

            MakeMove(move);

            var moveStr = valil.chess.board.getMoveStructure(move);
            if (moveStr.hasFlags) {
                // TODO: better handling of en passant captures, castlings and promotions
                this.draw();
            } else {
                var piece = valil.chess.board.getPiece(endSq.x, endSq.y);
                this.mainCtx.save();
                this.mainCtx.scale(this.displayScale, this.displayScale);
                this.mainCtx.translate(end.x, end.y);
                valil.chess.board.drawSquare(this.mainCtx, endSq.x, endSq.y);
                valil.chess.board.drawPiece(this.mainCtx, piece);
                this.mainCtx.restore();
            }

            setTimeout(this.searchMove, 50);
        } else {
            var start = this.getSquareCoords(this.startSq.x, this.startSq.y);
            var piece = valil.chess.board.getPiece(this.startSq.x, this.startSq.y);

            this.mainCtx.save();
            this.mainCtx.scale(this.displayScale, this.displayScale);
            this.mainCtx.translate(start.x, start.y);
            valil.chess.board.drawPiece(this.mainCtx, piece);
            this.mainCtx.restore();
        }

        this.dragCtx.canvas.style.visibility = 'hidden';
        this.dragCtx.canvas.style.left = "0px";
        this.dragCtx.canvas.style.top = "0px";
        this.dragCtx.clearRect(0, 0, this.dragCtx.canvas.width, this.dragCtx.canvas.height);
    },
    aiMove: function(move, value, timeTaken, ply) {
        this.inputScale = this.getStyleSize();
        
        if (move) {
            this.moveEvent.fire({move:GetMoveSAN(move), aiDetails:BuildPVMessage(move, value, timeTaken, ply)});

            MakeMove(move);

            var moveStr = valil.chess.board.getMoveStructure(move);
            if (moveStr.hasFlags) {
                // TODO: better handling of en passant captures, castlings and promotions
                this.draw();
            } else {
                var startSq = valil.chess.board.getSquare(moveStr.from);
                var start = this.getSquareCoords(startSq.x, startSq.y);
                var endSq = valil.chess.board.getSquare(moveStr.to);
                var end = this.getSquareCoords(endSq.x, endSq.y);
                var piece = valil.chess.board.getPiece(endSq.x, endSq.y);

                this.mainCtx.save();
                this.mainCtx.scale(this.displayScale, this.displayScale);
                this.mainCtx.translate(start.x, start.y);
                valil.chess.board.drawSquare(this.mainCtx, startSq.x, startSq.y);
                this.mainCtx.restore();

                this.mainCtx.save();
                this.mainCtx.scale(this.displayScale, this.displayScale);
                this.mainCtx.translate(end.x, end.y);
                valil.chess.board.drawSquare(this.mainCtx, endSq.x, endSq.y);
                valil.chess.board.drawPiece(this.mainCtx, piece);
                this.mainCtx.restore();
            }
        }
    },
    newGame: function() {
        ResetGame();
        this.draw();
    },
    getSquare: function(p) {
        return {x: Math.floor(p.x / (valil.chess.draw.squareSize * this.inputScale)), y: Math.floor(p.y / (valil.chess.draw.squareSize * this.inputScale))};
    },
    getDelta: function(p) {
        return {x: (p.x % (valil.chess.draw.squareSize * this.inputScale)), y: (p.y % (valil.chess.draw.squareSize * this.inputScale))};
    },
    getSquareCoords: function(x, y) {
        return {x: x * valil.chess.draw.squareSize, y: y * valil.chess.draw.squareSize};
    },
    getStyleSize: function(){
        return parseInt(document.defaultView.getComputedStyle(this.mainCtx.canvas,null).width) / (valil.chess.draw.squareSize << 3);
    }
};
valil.chess.board.drawPiece = function(ctx, p) {
    ctx.save();
    var color = (p & 0x8) ? valil.chess.draw.whitePieceColor : valil.chess.draw.blackPieceColor;
    switch (p & 0x7) {
        case pieceEmpty: break;
        case piecePawn: valil.chess.draw.pawn(ctx, color); break;
        case pieceKnight: valil.chess.draw.knight(ctx, color); break;
        case pieceBishop: valil.chess.draw.bishop(ctx, color); break;
        case pieceRook: valil.chess.draw.rook(ctx, color); break;
        case pieceQueen: valil.chess.draw.queen(ctx, color); break;
        case pieceKing: valil.chess.draw.king(ctx, color); break;
    }
    ctx.restore();
};
valil.chess.board.drawSquare = function(ctx, x, y) {
    ctx.save();
    ctx.fillStyle = (y ^ x) & 1 ? valil.chess.draw.blackSquareColor : valil.chess.draw.whiteSquareColor;
    ctx.fillRect(0, 0, valil.chess.draw.squareSize, valil.chess.draw.squareSize);
    ctx.restore();
};
valil.chess.board.getPiece = function(x, y) {
    return g_board[((y + 2) * 0x10) + x + 4];
};
valil.chess.board.getSquare = function(sq) {
    return {x: (sq & 0xF) - 4, y: (sq >> 4) - 2};
};
valil.chess.board.getMoveStructure = function(move) {
    // TODO: handle en passant captures, castlings and promotions
    return {from: move & 0xFF, to: (move >> 8) & 0xFF, hasFlags: (move & 0xFF0000) !== 0};
};
valil.chess.board.getMove = function(startSq, endSq) {
    var moves = GenerateValidMoves();
    for (var i = 0, moveStr; i < moves.length; i++) {
        moveStr = valil.chess.board.getMoveStructure(moves[i]);
        if (moveStr.from === MakeSquare(startSq.y, startSq.x) &&
                moveStr.to === MakeSquare(endSq.y, endSq.x)) {
            return moves[i];
        }
    }

    return null;
};
valil.chess.board.getPreferredSize = function() {
    var size = Math.min(screen.width, screen.height);
    if (size >= 1200)
        return 720;
    else if (size >= 768)
        return 480;
    else if (size >= 320)
        return 320;
    else
        return 240;
};
