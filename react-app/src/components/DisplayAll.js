import { useEffect, useState } from "react";
const DisplayAll = ({ url }) => {
    const endponint = url + "/readAll.php";
    const [bookmarks, setBookmarks] = useState(null);
    useEffect(() => {
        const fetchBookmarks = async () => {
            const response = await fetch(endponint);
            const responseJSON = await response.json();
            setBookmarks(responseJSON);
            console.log(bookmarks);
        };
        fetchBookmarks();
    }, []);

    return (
        <div className="DisplayAll">
            <h1>Bookmarks</h1>
            <table className="bookmark-table">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    {bookmarks &&
                        bookmarks.map((bookmark) => {
                            return (
                                <tr key={bookmark.id}>
                                    <td>{bookmark.title}</td>
                                    <td>{bookmark.link}</td>
                                </tr>
                            );
                        })}
                </tbody>
            </table>
        </div>
    );
};

export default DisplayAll;
