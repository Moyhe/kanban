import { Outlet } from "react-router-dom";
import Home from "./Pages/Home";

function App() {
    return (
        <>
            <main>
                <Home />
            </main>
            <Outlet />
        </>
    );
}

export default App;
