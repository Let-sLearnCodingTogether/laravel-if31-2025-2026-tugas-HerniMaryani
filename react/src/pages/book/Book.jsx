import { useCallback, useState, useEffect } from "react";

export default function BookPage() { 
    const [isLoading, setIsLoading] = useState (false);
    const [books, setBooks]= useState([]);

    const fetchBooks =useCallback(async() => {
       try {
            setIsLoading(true);
            const response = await http.get("/book");

            setBooks(response.data.data);
        } catch (error) {
            console.log(error);
        } finally {
            setIsLoading(false);
        }
    }, [])

    useEffect(() => {
        fetchBooks()
    }, [fetchBooks])

    if (isLoading) {
        return <div>Loading...</div>
    } else {
        return <div className="container mx-auto space-y-5">
            <h1 className="font-semibold text-2xl">Book</h1>
            <ul className="space-y-4 divide-y divide-zinc-200 dark:divide-zinc-700">
                {books.map((book) => (
                    <li key={book.id} className="pt-4 p-5 border border-slate-300">
                        <blockquote className="text-zinc-800 dark:text-zinc-100 italic">
                            {book.title}
                        </blockquote>
                        <blockquote className="text-zinc-800 dark:text-zinc-100 italic">
                            {book.author}
                        </blockquote>
                        <div className="mt-1 text-sm text-zinc-500 dark:text-zinc-400">
                            — {book.author}
                            {book.publication_year && <span className="ml-1">({book.publication_year})</span>}
                        </div>
                        <blockquote className="text-zinc-800 dark:text-zinc-100 italic">
                            {book.genre}
                        </blockquote>
                        <li key={book.id} className="pt-4 p-5 border border-slate-300">
                            <div className="mb-2">
                                 <label for="">Status Bacaan</label>
                                 <select name="read_status" class="form-control @error('read_status') is-invalid @enderror">
                                 <option value="read_status">-- Pilih Hasil --</option>
                                 <option value="Belum" selected={'Sudah' === book.read_status}>Sudah dibaca</option>
                                 <option value="Belum" selected={'Belum' === book.read_status}>Belum dibaca</option>
                                </select>
                            </div>
                        </li>
                    </li>
                ))}
            </ul>
        </div>
    }

}