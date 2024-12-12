import React, { useState } from "react";
const Create = ({ url }) => {
    const endpoint = url + "/create.php";
    const [title, setTitle] = useState("");
    const [link, setLink] = useState("");
    const onSubmit = async () => {
        await fetch(endpoint, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                title: title,
                link: link,
            }),
        });
        setTitle("");
        setLink("");
    };
    return (
        <div>
            <h1>Create</h1>
            <form onSubmit={onSubmit}>
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
                <button type="submit">Create</button>
            </form>
        </div>
    );
};

export default Create;
