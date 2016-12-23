import * as React from "react";
import {PopupComponent} from "./Popup";

export default class LoadingComponent extends PopupComponent
{
    protected getTemplate() {
        return <div className="center-fixed"><div className="centered-element-wrapper"><img src={this.props.content} alt={this.props.message}/></div></div>;
    }
}