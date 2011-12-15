// from Prototype.js, see http://ejohn.org/apps/learn/#2
if (!Function.prototype.bind) {
    Function.prototype.bind = function () {
        var fn = this, args = Array.prototype.slice.call(arguments), object = args.shift();
        return function () {
            return fn.apply(object, args.concat(Array.prototype.slice.call(arguments)));
        };
    };
}

// from http://ejohn.org/blog/ecmascript-5-objects-and-properties/
if (!Object.defineProperty) {
    Object.defineProperty = function(obj, prop, desc) {
        // TODO: not proper implementation, but not much you can do
        obj[prop] = desc.value;
    };
}
if (!Object.defineProperties) {
    Object.defineProperties = function(obj, props) {
        for (var prop in props) {
            Object.defineProperty(obj, prop, props[prop]);
        }
    };
}
if (!Object.create) {
    Object.create = function(proto, props) {
        var ctor = function(ps) {
            if (ps)
                Object.defineProperties(this, ps);
        };
        ctor.prototype = proto;
        return new ctor(props);
    };
}

