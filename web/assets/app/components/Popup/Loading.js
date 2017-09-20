"use strict";
var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
var React = require("react");
var Popup_1 = require("./Popup");
var LoadingComponent = (function (_super) {
    __extends(LoadingComponent, _super);
    function LoadingComponent() {
        _super.apply(this, arguments);
    }
    LoadingComponent.prototype.getTemplate = function () {
        return <div className="center-fixed"><div className="centered-element-wrapper"><img src={this.props.content} alt={this.props.message}/></div></div>;
    };
    return LoadingComponent;
}(Popup_1.PopupComponent));
exports.__esModule = true;
exports["default"] = LoadingComponent;
//# sourceMappingURL=Loading.js.map