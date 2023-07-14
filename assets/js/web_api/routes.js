import Step1 from "./pages/Step1.js";
import Step2 from "./pages/Step2.js";
import Step3 from "./pages/Step3.js";
import Recap from "./pages/Recap";

export default {
    "/step-one": Step1,
    "/step-two": Step2,
    "/step-three": Step3,
    "/recap:": Recap,
    //  "/page3": {
    //    component: Page3,
    //    attributes: {
    //      id: 5,
    //    },
    //  },
    "/exo": {
        component: Exo,
        attributes: {
            cols: 10,
        },
    },
};