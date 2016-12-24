import * as React from "react";

export interface Coefficient {
    type: string;
    value: number;
    difference: number;
}

export interface CoefficientState {

}

export default class CoefficientComponent extends React.Component<Coefficient, CoefficientState> {
    public render() {
        return <td>{ this.props.value } ( { this.props.difference } )</td>
    }
}