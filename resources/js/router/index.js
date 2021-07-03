import Home from "../views/Home";
import Kunde from "../views/Kunde";
import Fahrzeug from "../views/Fahrzeug";
import Nutzerverwaltung from "../views/Nutzerverwaltung";

export const routes = [
    {
        path: "/user",
        component: Nutzerverwaltung
    },
    {
        path: "/",
        component: Home
    },
    {
        path: "/customers",
        component: Kunde
    },
    {
        path: "/cars",
        component: Fahrzeug
    }
];
