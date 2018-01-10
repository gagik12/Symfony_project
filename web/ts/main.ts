import {UserListLoader} from "./UserListLoader";
import {PopUp} from "./PopUp";
import {IconBar} from "./IconBar";

window.onload = (): void => {
    new UserListLoader();
    new PopUp();
    new IconBar();
};