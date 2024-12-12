import { useState } from "react";
const Update = ({ url }) => {
    const endpoint = url + "/update.php";
    const [id, setId] = useState("");
    const [title, setTitle] = useState("");
    const [link, setLink] = useState("");
    const onSubmit = async () => {
        await fetch(endpoint, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                id: id,
                title: title,
                link: link,
            }),
        });
        setId("");
        setTitle("");
        setLink("");
    };
    return (
        <div>
            <h1>Update</h1>
            <form onSubmit={onSubmit}>
                <input
                    type="text"
                    placeholder="Id"
                    value={id}
                    onChange={(e) => setId(e.target.value)}
                />
                <input
                    type="text"
                    placeholder="Title"
                    value={title}
                    onChange={(e) => setTitle(e.target.value)}
                />
                <input
                    type="text"
                    placeholder="Link"
                    value={link}
                    onChange={(e) => setLink(e.target.value)}
                />
                <button type="submit">Update</button>
            </form>
        </div>
    );
};
export default Update;
