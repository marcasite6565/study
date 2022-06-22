import { useEffect, useState } from "react";
import Movies from "../components/Movies";
import Loading from "../components/Loading";
import styles from "./routes.module.css";

function Top() {
    const [loading, setLoading] = useState(true);
    const [topMovies, setTopMovies] = useState([]);

    const getMovies = async() => {
        let json = await (
            await fetch(
                'https://yts.mx/api/v2/list_movies.json?limit=10&sort_by=rating'
            )
        ).json();
        setTopMovies(json.data.movies);
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
                    <div className={styles.title}>Rating Top 10</div>
                    <Movies movies={topMovies} />
                </div>
                )
            }
        </div>
    );
}

export default Top;