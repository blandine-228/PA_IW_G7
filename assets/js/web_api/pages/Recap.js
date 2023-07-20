import {BrowserLink} from "../components/BrowserRouter";

export default function Recap() {
    return {
        type: "div",
        attributes: {
            id: "page1",
        },
        children: [
            {
                type: "h1",
                children: ["Récapitulatif"],
            },
        ],
    };
}