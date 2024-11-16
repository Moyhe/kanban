import Member from "../entities/Member";

interface Props {
    members: Member[];
}

const Card = ({ members }: Props) => {
    return (
        <div className="space-y-2">
            {members.length > 0 ? (
                members.map((member) => (
                    <>
                        <div
                            key={member.id}
                            className="bg-gray-300 text-gray-800 p-3 rounded shadow hover:bg-gray-400 transition"
                        >
                            <div className="flex justify-between">
                                <p>{member.name}</p>
                                <p> {member.created_at} </p>
                            </div>
                            <p> {member.email} </p>
                            <p> {member.mobile_number} </p>
                        </div>
                    </>
                ))
            ) : (
                <p className="text-gray-500 italic">No cards available</p>
            )}
        </div>
    );
};

export default Card;
