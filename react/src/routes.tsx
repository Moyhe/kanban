import { createBrowserRouter } from "react-router-dom";
import Board from "./Pages/Board";
import App from "./App";

const router = createBrowserRouter([
    {
        path: "/",
        children: [
            {
                index: true,
                element: <App />,
            },
            {
                path: "board",
                element: <Board />,
            },
        ],
    },
]);

export default router;
