"use strict";
var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
var React = require("react");
var PopupComponent = (function (_super) {
    __extends(PopupComponent, _super);
    function PopupComponent() {
        _super.apply(this, arguments);
    }
    PopupComponent.prototype.render = function () {
        if (this.props.display) {
            return <div id="dialog-window-wrapper">
                <div id="dialog-background"></div>
                {this.getTemplate()}
            </div>;
        }
        else {
            return null;
        }
    };
    return PopupComponent;
}(React.Component));
exports.PopupComponent = PopupComponent;
//# sourceMappingURL=Popup.js.map