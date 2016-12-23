import * as React from "react";

export interface PopupProps {
    message: string;
    content: string;
    display: boolean;
}

export interface PopupState {

}

export abstract class PopupComponent extends React.Component<PopupProps, PopupState> {
    public render() {
        if (this.props.display) {
            return <div id="dialog-window-wrapper">
                <div id="dialog-background"></div>
                {this.getTemplate()}
            </div>;
        } else {
            return null;
        }
    }

    protected abstract getTemplate();
}