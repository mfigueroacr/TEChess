valil = window.valil || {};
valil.chess = valil.chess || {};

valil.chess.draw = {};
valil.chess.draw.bishop = function(ctx, color) {
    ctx.translate(10, 10);
    ctx.path("M50,90 C45,91,45,97,40,98 L5,98 L1,81 L28,81 C29,80,29,75,30,74 L70,74 C71,75,71,80,72,81 L99,81 L95,98 L60,98 C55,97,55,91,50,90 Z "
            + "M70,67 L30,67 C16,65,26,28,40,21 Q48,30,48,44 L54,44 Q54,30,46,21 C42,15,44,3,52,2 C60,3,58,12,57,17 L60,21 C74,28,84,65,70,67 Z ");

    ctx.fillStyle = color;
    ctx.applyShadow("SH 4,4,'rgba(0,0,0,0.5)'");
    ctx.fill();
    ctx.applyShadow("SH 0,0,'black'");

    ctx.strokeStyle = 'black';
    ctx.lineWidth = 2;
    ctx.stroke();

    ctx.applyTransform("T 35,35 R 0.5236 S 0.7,1");
    ctx.fillStyle = ctx.getGradient("RG0,0,0,0,0,60 S0,'rgba(255,255,255,1)' S0.2,'rgba(255,255,255,0.4)' S0.5,'rgba(255,255,255,0.25)' S1,'rgba(0,0,0,0.25)'");
    ctx.fill();
};
valil.chess.draw.king = function(ctx, color) {
    ctx.translate(10, 10);
    ctx.path("M86,99 L14,99 Q14,83,22,82 Q50,80,78,82 Q86,83,86,99 Z " +
            "M78,74 Q50,72,22,74 Q18,72,20,67 Q22,63,16,56 Q4,43,11,28 Q21,16,38,23 Q46,28,50,38 Q54,28,62,23 Q79,16,89,28 Q96,43,84,56 Q78,63,80,67 Q82,72,78,74 Z " +
            "M42,10 L50,34 L58,10 A50,9,8,0,3.14159265359,1 Z " +
            "M41,58 L37,45 C34,39,28,43,33,49 L37,58 C37,63,41,63,41,58 Z " +
            "M59,58 C59,63,63,63,63,58 L67,49 C72,43,66,39,63,45 L59,58 Z ");

    ctx.fillStyle = color;
    ctx.applyShadow("SH 4,4,'rgba(0,0,0,0.5)'");
    ctx.fill();
    ctx.applyShadow("SH 0,0,'black'");

    ctx.strokeStyle = 'black';
    ctx.lineWidth = 2;
    ctx.stroke();

    ctx.applyTransform("T 18,28 R 0.5236 S 0.7,1");
    ctx.fillStyle = ctx.getGradient("RG0,0,0,0,0,60 S0,'rgba(255,255,255,1)' S0.2,'rgba(255,255,255,0.4)' S0.5,'rgba(255,255,255,0.25)' S1,'rgba(0,0,0,0.25)'");
    ctx.fill();
};
valil.chess.draw.knight = function(ctx, color) {
    ctx.translate(10, 10);
    ctx.path("M82,99 L10,99 Q10,83,18,82 Q46,80,74,82 Q82,83,82,99 Z " +
            "M74,74 Q46,72,18,74 Q16,75,16,70 Q17,25,45,16 Q50,16,54,13 L62,4 Q66,0,67,5 Q68,13,75,19 Q78,22,78,28 Q81,34,84,38 Q93,47,93,55 C93,60,85,67,80,60 Q78,56,72,54 Q63,52,56,46 Q54,42,52,45 Q50,53,56,58 Q60,62,66,65 Q73,68,76,72 Z ");

    ctx.fillStyle = color;
    ctx.applyShadow("SH 4,4,'rgba(0,0,0,0.5)'");
    ctx.fill();
    ctx.applyShadow("SH 0,0,'black'");

    ctx.strokeStyle = 'black';
    ctx.lineWidth = 2;
    ctx.stroke();

    ctx.applyTransform("T 30,30 R 0.5236 S 0.7,1");
    ctx.fillStyle = ctx.getGradient("RG0,0,0,0,0,60 S0,'rgba(255,255,255,1)' S0.2,'rgba(255,255,255,0.4)' S0.5,'rgba(255,255,255,0.25)' S1,'rgba(0,0,0,0.25)'");
    ctx.fill();
};
valil.chess.draw.pawn = function(ctx, color) {
    ctx.translate(10, 10);
    ctx.path("M80,89 L20,89 Q20,69,43,55 C30,48,30,35,42,29 A50,21,10,2.35619449,0.7853981637,0 C70,35,70,48,57,55 Q80,69,80,89 Z ");

    ctx.fillStyle = color;
    ctx.applyShadow("SH 4,4,'rgba(0,0,0,0.5)'");
    ctx.fill();
    ctx.applyShadow("SH 0,0,'black'");

    ctx.strokeStyle = 'black';
    ctx.lineWidth = 2;
    ctx.stroke();

    ctx.applyTransform("T 43,33 R 0.5236 S 0.7,1");
    ctx.fillStyle = ctx.getGradient("RG0,0,0,0,0,60 S0,'rgba(255,255,255,1)' S0.2,'rgba(255,255,255,0.4)' S0.5,'rgba(255,255,255,0.25)' S1,'rgba(0,0,0,0.25)'");
    ctx.fill();
};
valil.chess.draw.queen = function(ctx, color) {
    ctx.translate(10, 10);
    ctx.path("M86,99 L14,99 Q14,83,22,82 Q50,80,78,82 Q86,83,86,99 Z " +
            "M78,74 Q50,72,22,74 L8,39 A11,30,9,1.96349541,0.7853981634,0 L28,49 L34,24 A38,16,9,1.96349541,0.7853981634,0 L50,47 L57,23 A62,16,9,2.3561945,1.1780972451,0 L72,49 L83,36 A89,30,9,2.3561945,1.1780972451,0 L78,74 Z");

    ctx.fillStyle = color;
    ctx.applyShadow("SH 4,4,'rgba(0,0,0,0.5)'");
    ctx.fill();
    ctx.applyShadow("SH 0,0,'black'");

    ctx.strokeStyle = 'black';
    ctx.lineWidth = 2;
    ctx.stroke();

    ctx.applyTransform("T 37,25 R 0.5236 S 0.7,1");
    ctx.fillStyle = ctx.getGradient("RG0,0,0,0,0,60 S0,'rgba(255,255,255,1)' S0.2,'rgba(255,255,255,0.4)' S0.5,'rgba(255,255,255,0.25)' S1,'rgba(0,0,0,0.25)'");
    ctx.fill();
};
valil.chess.draw.rook = function(ctx, color) {
    ctx.translate(10, 10);
    ctx.path("M86,99 L14,99 Q14,83,22,82 Q50,80,78,82 Q86,83,86,99 Z " +
            "M78,74 Q50,72,22,74 L27,44 Q50,42,73,44 L78,74 Z " +
            "M73,35 Q50,33,27,35 Q19,28,19,23 L18,9 L29,7 L33,20 L40,20 L44,5 L56,5 L60,20 L67,20 L71,7 L82,9 L81,23 Q81,28,73,35 Z");

    ctx.fillStyle = color;
    ctx.applyShadow("SH 4,4,'rgba(0,0,0,0.5)'");
    ctx.fill();
    ctx.applyShadow("SH 0,0,'black'");

    ctx.strokeStyle = 'black';
    ctx.lineWidth = 2;
    ctx.stroke();

    ctx.applyTransform("T 35,50 R 0.5236 S 0.7,1");
    ctx.fillStyle = ctx.getGradient("RG0,0,0,0,0,60 S0,'rgba(255,255,255,1)' S0.2,'rgba(255,255,255,0.4)' S0.5,'rgba(255,255,255,0.25)' S1,'rgba(0,0,0,0.25)'");
    ctx.fill();
};
valil.chess.draw.whitePieceColor = 'lightgrey';
valil.chess.draw.blackPieceColor = 'green';
valil.chess.draw.whiteSquareColor = 'mintcream';
valil.chess.draw.blackSquareColor = 'lightskyblue';
valil.chess.draw.squareSize = 120;