"use strict";
var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
var React = require("react");
var CoefficientComponent = (function (_super) {
    __extends(CoefficientComponent, _super);
    function CoefficientComponent() {
        _super.apply(this, arguments);
    }
    CoefficientComponent.prototype.render = function () {
        return <td>{this.props.value} ( {this.props.difference} )</td>;
    };
    return CoefficientComponent;
}(React.Component));
exports.__esModule = true;
exports["default"] = CoefficientComponent;
//# sourceMappingURL=Coefficient.js.map