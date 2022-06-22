import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import Movies from "../components/Movies";
import Loading from "../components/Loading";
import styles from "./routes.module.css";

function Search() {
    const {txt} = useParams();
    const [loading, setLoading] = useState(true);
    const [searchMovies, setSearchMovies] = useState([]);

    const getMovies = async() => {
        let json = await (
            await fetch(
                `https://yts.mx/api/v2/list_movies.json?sort_by=rating&limit=40&query_term=${txt}`
            )
        ).json();
        setSearchMovies(json.data.movies);
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
                    <div className={styles.title}>
                        Search for "{txt}"
                        <br/>
                        <span>검색 결과는 최대 40건까지 노출됩니다.</span>
                    </div>
                    <Movies movies={searchMovies} />
                </div>
                )
            }
        </div>
    );
}

export default Search;