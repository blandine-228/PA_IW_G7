import { BrowserLink } from "../components/BrowserRouter.js";

export default function Step2() {
    return {
        type: "div",
        children: [
            {
                type: "div",
                attributes: {
                    id: "page2",
                },
            },
            {
                type: "h1",
                children: ["Step 2"],
            },
            {
                type: BrowserLink,
                attributes: {
                    title: "Step3",
                    path: "/step-three",
                },
            },
        ],
    };
}