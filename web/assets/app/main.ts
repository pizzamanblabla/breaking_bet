import BetFiltersComponent from './components/Bet/Bet';

interface Component {
    name: string;
    element: any;
}

let components: Component[] = [
    {name: '#filters', element: BetFiltersComponent},
];

window.addEventListener('DOMContentLoaded', () => {


    // for (let component of components) {
    //     let instance = Object.create(component.element.prototype);
    //     component.element.prototype.constructor.call(instance, {el: component.name});
    // }

    document.getElementById('coefficient-1').addEventListener('change',  () => {
        var matches:NodeListOf<Element> = document.querySelectorAll(".range-wrapper label");

        [matches].map(function(match) {
            console.log(match);
        });
        alert('triggered');
    });

});