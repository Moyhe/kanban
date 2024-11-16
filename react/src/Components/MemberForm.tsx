import { zodResolver } from "@hookform/resolvers/zod";
import { FieldValues, useForm } from "react-hook-form";
import { z } from "zod";
import create from "../services/http-memberService";
import { useNavigate } from "react-router-dom";

const MemberForm = () => {
    const memberService = create("members");

    const navigate = useNavigate();

    const MemberSchema = z.object({
        name: z.string().min(2, "Name must be at least 2 characters"),
        title: z.string().min(2, "Title must be at least 2 characters"),
        age: z
            .number()
            .min(0, "Age must be greater than 0")
            .max(100, "Age must be less than 100"),
        email: z.string().email("Invalid email format"),
        mobile_number: z
            .string()
            .regex(
                /^\d{7,15}$/,
                "Mobile number must be between 7 and 15 digits"
            ),
    });

    type FormData = z.infer<typeof MemberSchema>;

    const {
        register,
        handleSubmit,
        formState: { errors },
    } = useForm<FormData>({
        resolver: zodResolver(MemberSchema),
    });

    const onSubmit = (data: FieldValues) => {
        memberService
            .create<FieldValues>(data)
            .then(() => navigate("/board"))
            .catch((error: Error) => {
                console.log(error.message);
            });
    };

    return (
        <>
            <div className="flex  min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
                <div className="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 className="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">
                        Form
                    </h2>
                </div>

                <div className="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form
                        onSubmit={handleSubmit(onSubmit)}
                        className="space-y-6"
                    >
                        <div>
                            <label
                                htmlFor="name"
                                className="block text-sm/6 font-medium text-gray-900"
                            >
                                Name
                            </label>
                            <div className="mt-2">
                                <input
                                    id="name"
                                    {...register("name")}
                                    type="text"
                                    className="block w-full rounded-md border-0 py-1.5 p-2 text-gray-900  sm:text-sm/6"
                                />
                            </div>
                            {errors.name && (
                                <p className="text-red-600 text-sm">
                                    {errors.name.message}
                                </p>
                            )}
                        </div>

                        <div>
                            <label
                                htmlFor="title"
                                className="block text-sm/6 font-medium text-gray-900"
                            >
                                Title
                            </label>
                            <div className="mt-2">
                                <input
                                    id="title"
                                    {...register("title")}
                                    type="text"
                                    className="block w-full rounded-md border-0 py-1.5 p-2 text-gray-900  sm:text-sm/6"
                                />
                            </div>

                            {errors.title && (
                                <p className="text-red-600 text-sm">
                                    {errors.title.message}
                                </p>
                            )}
                        </div>

                        <div>
                            <label
                                htmlFor="age"
                                className="block text-sm/6 font-medium text-gray-900"
                            >
                                Age
                            </label>
                            <div className="mt-2">
                                <input
                                    id="age"
                                    min={0}
                                    max={100}
                                    {...register("age", {
                                        valueAsNumber: true,
                                    })}
                                    type="number"
                                    className="block w-full rounded-md border-0 py-1.5 p-2 text-gray-900  sm:text-sm/6"
                                />
                            </div>
                            {errors.age && (
                                <p className="text-red-600 text-sm">
                                    {errors.age.message}
                                </p>
                            )}
                        </div>

                        <div>
                            <label
                                htmlFor="email"
                                className="block text-sm/6 font-medium text-gray-900"
                            >
                                Email
                            </label>
                            <div className="mt-2">
                                <input
                                    id="email"
                                    {...register("email")}
                                    type="email"
                                    autoComplete="email"
                                    className="block w-full rounded-md border-0 py-1.5 p-2 text-gray-900  sm:text-sm/6"
                                />
                            </div>
                            {errors.email && (
                                <p className="text-red-600 text-sm">
                                    {errors.email.message}
                                </p>
                            )}
                        </div>

                        <div>
                            <label
                                htmlFor="phone"
                                className="block text-sm/6 font-medium text-gray-900"
                            >
                                Phone
                            </label>
                            <div className="mt-2">
                                <input
                                    id="phone"
                                    {...register("mobile_number")}
                                    type="text"
                                    className="block w-full rounded-md border-0 py-1.5 p-2 text-gray-900  sm:text-sm/6"
                                />
                            </div>

                            {errors.mobile_number && (
                                <p className="text-red-600 text-sm">
                                    {errors.mobile_number.message}
                                </p>
                            )}
                        </div>

                        <div>
                            <button
                                type="submit"
                                className="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </>
    );
};

export default MemberForm;
