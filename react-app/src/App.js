import DisplayAll from "./components/DisplayAll";
import Create from "./components/Create";
import Update from "./components/Update";
import Delete from "./components/Delete";
import "./App.css";

function App() {
    const url = "http://localhost:3000/api/";
    return (
        <div className="App">
            <DisplayAll url={url} />
            <Create url={url} />
            <Update url={url} />
            <Delete url={url} />
        </div>
    );
}

export default App;
