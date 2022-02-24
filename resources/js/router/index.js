import Home from "../views/Home";
import Kunde from "../views/Kunde";
import Vertrag from "../views/Vertrag";
import Fahrzeug from "../views/Fahrzeug";
import Mietfahrzeuge from "../views/Mietfahrzeuge";
import Kaution from "../views/Kaution";
import Rabatt from "../views/Rabatt";
import Verleih from "../views/Verleih";
import Infos from "../views/Infos";
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
        path: "/vertrag",
        component: Vertrag
    },
    {
        path: "/customers",
        component: Kunde
    },
    {
        path: "/cars",
        component: Fahrzeug
    },
    {
        path: "/cars/rentable",
        component: Mietfahrzeuge
    },
    {
        path: "/deposits",
        component: Kaution
    },
    {
        path: "/discounts",
        component: Rabatt
    },
    {
        path: "/verleih",
        component: Verleih
    },
    {
        path: "/infos",
        component: Infos
    }
];
