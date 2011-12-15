valil = window.valil || {};
valil.utils = valil.utils || {};

valil.utils.dragdrop = {};
valil.utils.dragdrop.create = function (elem) {
    var dragdrop = Object.create(valil.utils.dragdrop.prototype, {
        elem: {value: elem},
        startDrag: {value: valil.utils.event.create()},
        drag: {value: valil.utils.event.create()},
        endDrag: {value: valil.utils.event.create()},
        isTouch: {value: valil.utils.isTouchDevice()},
        mx: {value: undefined},
        my: {value: undefined}
    });

    Object.defineProperties(dragdrop, {
        boundMouseDown: {value: dragdrop.mouseDown.bind(dragdrop)},
        boundMouseMove: {value: dragdrop.mouseMove.bind(dragdrop)},
        boundMouseUp: {value: dragdrop.mouseUp.bind(dragdrop)}
    });

    if (dragdrop.isTouch) {
        Object.defineProperties(dragdrop, {
            boundTouchStart: {value: dragdrop.touchStart.bind(dragdrop)},
            boundTouchMove: {value: dragdrop.touchMove.bind(dragdrop)},
            boundTouchEnd: {value: dragdrop.touchEnd.bind(dragdrop)}
        });
    }

    return dragdrop;
};
valil.utils.dragdrop.prototype = {
    startListening: function() {
        this.elem.addEventListener("mousedown", this.boundMouseDown, false);
        if (this.isTouch) {
            this.elem.addEventListener("touchstart", this.boundTouchStart, false);
        }
    },
    stopListening: function() {
        this.elem.removeEventListener("mousedown", this.boundMouseDown, false);
        if (this.isTouch) {
            this.elem.removeEventListener("touchstart", this.boundTouchStart, false);
        }
    },
    mouseDown: function (mouseEventArgs) {
        if (mouseEventArgs.button === 0) {
            var p = this.getEventLocalCoordinates(mouseEventArgs);

            var args = valil.utils.dragdropargs.create(p.x, p.y);
            this.startDrag.fire(args);

            if (!args.cancelled) {
                mouseEventArgs.preventDefault();
                mouseEventArgs.stopPropagation();

                this.mx = p.x;
                this.my = p.y;

                document.addEventListener("mousemove", this.boundMouseMove, false);
                document.addEventListener("mouseup", this.boundMouseUp, false);
            }
        }
    },
    mouseMove: function(mouseEventArgs) {
        mouseEventArgs.preventDefault();
        mouseEventArgs.stopPropagation();

        var p = this.getEventLocalCoordinates(mouseEventArgs);

        if (p.x !== this.mx || p.y !== this.my) {
            this.drag.fire(valil.utils.dragdropargs.create(p.x, p.y));

            this.mx = p.x;
            this.my = p.y;
        }
    },
    mouseUp: function(mouseEventArgs) {
        if (mouseEventArgs.button === 0) {
            mouseEventArgs.preventDefault();
            mouseEventArgs.stopPropagation();

            var p = this.getEventLocalCoordinates(mouseEventArgs);

            this.endDrag.fire(valil.utils.dragdropargs.create(p.x, p.y));

            this.mx = undefined;
            this.my = undefined;

            document.removeEventListener("mousemove", this.boundMouseMove, false);
            document.removeEventListener("mouseup", this.boundMouseUp, false);
        }
    },
    touchStart: function (touchEventArgs) {
        if (touchEventArgs.targetTouches.length === 1) {
            var p = this.getEventLocalCoordinates(touchEventArgs.targetTouches[0]);

            var args = valil.utils.dragdropargs.create(p.x, p.y);
            this.startDrag.fire(args);

            if (!args.cancelled) {
                touchEventArgs.preventDefault();
                touchEventArgs.stopPropagation();

                this.mx = p.x;
                this.my = p.y;

                document.addEventListener("touchmove", this.boundTouchMove, false);
                document.addEventListener("touchend", this.boundTouchEnd, false);
            }
        }
    },
    touchMove: function(touchEventArgs) {
        if (touchEventArgs.targetTouches.length === 1) {
            touchEventArgs.preventDefault();
            touchEventArgs.stopPropagation();

            var p = this.getEventLocalCoordinates(touchEventArgs.targetTouches[0]);

            if (p.x !== this.mx || p.y !== this.my) {
                this.drag.fire(valil.utils.dragdropargs.create(p.x, p.y));

                this.mx = p.x;
                this.my = p.y;
            }
        }
    },
    touchEnd: function(touchEventArgs) {
        if (touchEventArgs.targetTouches.length === 0) {
            touchEventArgs.preventDefault();
            touchEventArgs.stopPropagation();

            var p = this.getEventLocalCoordinates(
                    touchEventArgs.changedTouches ? touchEventArgs.changedTouches[0] : touchEventArgs.touches[0]
                    );

            this.endDrag.fire(valil.utils.dragdropargs.create(p.x, p.y));

            this.mx = undefined;
            this.my = undefined;

            document.removeEventListener("touchmove", this.boundTouchMove, false);
            document.removeEventListener("touchend", this.boundTouchEnd, false);
        }
    },
    getEventLocalCoordinates: function (eventArgs) {
        for (var x = eventArgs.pageX, y = eventArgs.pageY, node = this.elem; node; node = node.offsetParent) {
            x -= node.offsetLeft;
            y -= node.offsetTop;
        }
        return {x:x, y:y};
    }
};

valil.utils.dragdropargs = {};
valil.utils.dragdropargs.create = function(x, y) {
    return Object.create(valil.utils.dragdropargs.prototype, {
        x: {value: x},
        y: {value: y},
        cancelled: {value: false}
    });
};
valil.utils.dragdropargs.prototype = {
    preventDefault: function() {
        this.cancelled = true;
    }
};

valil.utils.isTouchDevice = function() {
    return !!('ontouchstart' in window);
};