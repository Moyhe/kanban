export default interface Member {
    id: number;
    name: string;
    title: string;
    age: number;
    email: string;
    created_at: string;
    mobile_number: string;
}

interface Links {
    url: string;
    active: boolean;
    label: string;
}

export interface Members {
    data: Member[];
    meta: { links: Links[] };
    links: object;
}
