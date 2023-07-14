import { BrowserLink } from "../components/BrowserRouter.js";

export default function Step2() {
    return {
        type: "div",
        children: [
            {
                type: BrowserLink,
                attributes: {
                    title: "Step1",
                    path: "/page1",
                },
            },
            {
                type: "div",
                attributes: {
                    id: "page2",
                },
                children: Array.from({ length: 10 }, function (_, index) {
                    return {
                        type: "img",
                        attributes: {
                            src: `https://picsum.photos/200/300?random=${index}`,
                        },
                    };
                }),
            },
        ],
    };
}