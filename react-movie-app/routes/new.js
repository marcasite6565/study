import { useEffect, useState } from "react";
import Movies from "../components/Movies";
import Loading from "../components/Loading";
import styles from "./routes.module.css";

function New() {
    const [loading, setLoading] = useState(true);
    const [newMovies, setNewMovies] = useState([]);

    const getMovies = async() => {
        let json = await (
            await fetch(
                'https://yts.mx/api/v2/list_movies.json?minimum_rating=0.1&sort_by=year&limit=10'
            )
        ).json();
        setNewMovies(json.data.movies);
        setLoading(false);
    }

    useEffect(() => {
        getMovies()
    },[]);

    return (
        <div>
            {loading ?
                <Loading />
            : 
                (
                <div className={styles.moviebody}>
                    <div className={styles.title}>NEW Movies 10</div>
                    <Movies movies={newMovies} />
                </div>
                )
            }
        </div>
    );
}

export default New;