import Home from "../views/Home";
import Nutzerverwaltung from "../views/Nutzerverwaltung";

export const routes = [
    {
        path: "/",
        component: Home
    },
    {
        path: "/user",
        component: Nutzerverwaltung
    }
];
