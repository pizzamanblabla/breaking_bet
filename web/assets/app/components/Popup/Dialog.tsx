import * as React from "react";
import {PopupComponent} from "./Popup";

export default class DialogComponent extends PopupComponent
{
    protected getTemplate() {
        return <div id="dialog-window" className="center-fixed">{this.props.message}</div>;
    }
}