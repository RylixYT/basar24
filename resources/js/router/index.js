import Home from "../views/Home";
import Kunde from "../views/Kunde";
import Fahrzeug from "../views/Fahrzeug";
import Mietfahrzeuge from "../views/Mietfahrzeuge";
import Kaution from "../views/Kaution";
import Rabatt from "../views/Rabatt";
import Verleih from "../views/Verleih";
import Verleihverlauf from "../views/Verleihverlauf";
import Werbung from "../views/Werbung";
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
        path: "/ads",
        component: Werbung
    },
    {
        path: "/verleihe/offen",
        component: Verleih
    },
    {
        path: "/verleihe/verlauf",
        component: Verleihverlauf
    }
];
