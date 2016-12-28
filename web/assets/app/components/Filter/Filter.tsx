import * as React from "react";
import CoefficientComponent from "./../Bet/Coefficient"

interface FilterParameters {
    dateFrom: string;
    dateTo: string;
    sport?: number;
    chain?: number;
    coefficients: CoefficientComponent[]
}