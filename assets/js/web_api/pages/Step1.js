import { BrowserLink } from "../components/BrowserRouter.js";

export default function Step1() {
    return {
        type: "div",
        attributes: {
            id: "page1",
        },
        children: [
            {
                type: "h1",
                children: ["Page 1"],
            },
            {
                type: BrowserLink,
                attributes: {
                    title: "Step2",
                    path: "/page2",
                },
            },
        ],
    };
}