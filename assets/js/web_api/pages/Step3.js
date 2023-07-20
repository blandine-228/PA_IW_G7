import {BrowserLink} from "../components/BrowserRouter";

export default function Step3() {
    return {
        type: "div",
        attributes: {
            id: "step3",
        },
        children: [
            {
                type: "h1",
                children: ["Step 3"],
            },
            {
                type: BrowserLink,
                attributes: {
                    title: "Recap",
                    path: "/recap",
                },
            },
        ],
    };
}