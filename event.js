valil = window.valil || {};
valil.utils = valil.utils || {};

valil.utils.event = {};
valil.utils.event.create = function () {
    return Object.create(valil.utils.event.prototype, {
        handlers: {value: []}
    });
};
valil.utils.event.prototype = {
    subscribe: function(thisObj, handler) {
        if (this.indexOf(thisObj, handler) === -1) {
            this.handlers.push({thisObj:thisObj,handler:handler});
        }
    },
    unsubscribe: function(thisObj, handler) {
        var index = this.indexOf(thisObj, handler);
        if (index !== -1) {
            this.handlers.splice(index, 1);
        }
    },
    fire: function(eventArgs) {
        this.handlers.forEach(function (h) {
            h.handler.call(h.thisObj, eventArgs);
        });
    },
    indexOf: function(thisObj, handler) {
        for (var i = 0; i < this.handlers.length; i++) {
            if (this.handlers[i].thisObj === thisObj && this.handlers[i].handler === handler) {
                return i;
            }
        }

        return -1;
    }
};