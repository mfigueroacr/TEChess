// TODO: use a wrapper instead of modifying the prototype: see http://valentiniliescu.wordpress.com/2010/12/05/html5-canvas-context-commands-part3/
CanvasRenderingContext2D.prototype.M = CanvasRenderingContext2D.prototype.moveTo;
CanvasRenderingContext2D.prototype.L = CanvasRenderingContext2D.prototype.lineTo;
CanvasRenderingContext2D.prototype.C = CanvasRenderingContext2D.prototype.bezierCurveTo;
CanvasRenderingContext2D.prototype.Q = CanvasRenderingContext2D.prototype.quadraticCurveTo;
CanvasRenderingContext2D.prototype.A = CanvasRenderingContext2D.prototype.arc;
CanvasRenderingContext2D.prototype.Z = CanvasRenderingContext2D.prototype.closePath;
CanvasRenderingContext2D.prototype.S = CanvasRenderingContext2D.prototype.scale;
CanvasRenderingContext2D.prototype.R = CanvasRenderingContext2D.prototype.rotate;
CanvasRenderingContext2D.prototype.T = CanvasRenderingContext2D.prototype.translate;
CanvasRenderingContext2D.prototype.LG = CanvasRenderingContext2D.prototype.createLinearGradient;
CanvasRenderingContext2D.prototype.RG = CanvasRenderingContext2D.prototype.createRadialGradient;
CanvasRenderingContext2D.PathDataRegEx = /[MLCQAZ]\s*(?:[-+]?\d*\.?\d+(?:,)?)*/g;
CanvasRenderingContext2D.TransformDataRegEx = /[SRT]\s*(?:[-+]?\d*\.?\d+(?:,)?)*/g;
CanvasRenderingContext2D.GradientRegEx = /(?:LG|RG)\s*(?:[-+]?\d*\.?\d+(?:,)?)*/;
CanvasRenderingContext2D.GradientStopsRegEx = /S\s*[-+]?\d*\.?\d+(?:,)'[^']+'/g;
CanvasRenderingContext2D.NumbersRegEx = /[-+]?\d*\.?\d+/g;
CanvasRenderingContext2D.GradientStopRegEx = /S\s*([-+]?\d*\.?\d+)(?:,)'([^']+)'/;
CanvasRenderingContext2D.ShadowRegEx = /SH\s*([-+]?\d*\.?\d+)(?:,)([-+]?\d*\.?\d+)(?:,)'([^']+)'/;
CanvasRenderingContext2D.prototype.path = function (pathStr) {
    this.beginPath();
    var matches = pathStr.match(CanvasRenderingContext2D.PathDataRegEx);
    matches.forEach(function (match) {
        var params = match.match(CanvasRenderingContext2D.NumbersRegEx);
        this[match[0]].apply(this, params ? params.map(parseFloat) : []);
    }, this);
};
CanvasRenderingContext2D.prototype.applyTransform = function (tranStr) {
    var matches = tranStr.match(CanvasRenderingContext2D.TransformDataRegEx);
    matches.forEach(function (match) {
        var params = match.match(CanvasRenderingContext2D.NumbersRegEx);
        this[match[0]].apply(this, params ? params.map(parseFloat) : []);
    }, this);
};
CanvasRenderingContext2D.prototype.getGradient = function (gradStr) {
    var matches = gradStr.match(CanvasRenderingContext2D.GradientRegEx);
    var params = matches[0].match(CanvasRenderingContext2D.NumbersRegEx);
    var gradient = this[matches[0].substr(0, 2)].apply(this, params.map(parseFloat));
    matches = gradStr.match(CanvasRenderingContext2D.GradientStopsRegEx);
    matches.forEach(function (match) {
        params = match.match(CanvasRenderingContext2D.GradientStopRegEx);
        gradient.addColorStop(params[1], params[2]);
    });
    return gradient;
};
CanvasRenderingContext2D.prototype.applyShadow = function (shadowStr) {
    var matches = shadowStr.match(CanvasRenderingContext2D.ShadowRegEx);
    this.shadowOffsetX = matches[1];
    this.shadowOffsetY = matches[2];
    this.shadowColor = matches[3];
};
