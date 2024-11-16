import { useEffect, useState } from "react";

import create from "../services/http-memberService";
import Member, { Members } from "../entities/Member";
import { CanceledError } from "axios";

const useMembers = () => {
    const memberService = create("members");
    const [members, setMembers] = useState<Member[]>([]);
    const [error, setError] = useState("");

    useEffect(() => {
        memberService
            .getAll<Members>()
            .then(({ data }) => {
                const members = data;
                setMembers(members.data);
            })
            .catch((err: Error) => {
                if (err instanceof CanceledError) return;
                setError(err.message);
            });
    }, []);

    return { members, error };
};

export default useMembers;
