import { Config } from "ziggy-js";

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export interface Animal {
    id: number;
    name: string;
    description: string;
    price: number;
    age: number;
    type: {
        id: number;
        name: string;
    };
    breed: {
        id: number;
        name: string;
    };
    image: string;
    is_sold: boolean;
    created_at: string;
    updated_at: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
> = T & {
    auth: {
        user: User;
    };
    ziggy: Config & { location: string };
};
