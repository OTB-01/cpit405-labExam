import { useState } from "react";
const Delete = ({ url }) => {
    const endpoint = url + "/delete.php";
    const [id, setId] = useState("");
    const onSubmit = async () => {
        await fetch(endpoint, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id: id,
            }),
        });
        setId("");
    };
    return (
        <div>
            <h1>Delete</h1>
            <form onSubmit={onSubmit}>
                <input
                    type="text"
                    placeholder="Id"
                    value={id}
                    onChange={(e) => setId(e.target.value)}
                />
                <button type="submit">Delete</button>
            </form>
        </div>
    );
};
export default Delete;
