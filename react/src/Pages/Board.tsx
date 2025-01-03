import Card from "../Components/Card";
import useMembers from "../hooks/useMembers";

const Board = () => {
    const { error, members } = useMembers();

    const columns = [
        { title: "Unclaimed", count: 3 },
        { title: "First Contact", count: 1 },
        { title: "Preparing Work Offer", count: 1 },
        { title: "Send to Therapist", count: 1 },
    ];

    return (
        <div className="flex flex-col items-center bg-gray-100 min-h-screen p-4 ">
            {error && <p className="text-sm text-red-600">{error}</p>}
            <h1 className="text-2xl font-bold mb-4 text-gray-800">
                Operations Board
            </h1>
            <div className="grid grid-cols-1 md:grid-cols-4 gap-4 w-full max-w-7xl ">
                {columns.map((column, index) => (
                    <div
                        key={index}
                        className="bg-gray-200 rounded-lg p-4 shadow-md flex flex-col"
                    >
                        <div className="flex justify-between">
                            <h2 className="text-lg font-semibold text-gray-700 mb-2">
                                {column.title}
                            </h2>
                            <p className="rounded-full bg-slate-100 w-7 h-7 bottom-1 flex items-center justify-center">
                                {column.count}
                            </p>
                        </div>
                    </div>
                ))}
                <Card members={members} />
            </div>
        </div>
    );
};

export default Board;
