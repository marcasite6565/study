import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import styles from "./routes.module.css";

function Detail() {
    const {id} = useParams();
    const [movie, setMovie] = useState([]);
    const [desc, setDesc] = useState("");
    const [genre, setGenre] = useState("");
    const getMovie = async () => {
        const json = await (
            await fetch(`https://yts.mx/api/v2/movie_details.json?movie_id=${id}`)
        ).json();
        setMovie(json.data.movie);
        setDesc(json.data.movie.description_full.replace(/&#39;/g,"'"));
        setGenre(json.data.movie.genres.map(g => g === json.data.movie.genres[json.data.movie.genres.length-1] ? g : `${g}, `));
    }
    useEffect(() => {
        getMovie();
    }, [])

    return (
        <div>
            <div className={styles.detail__title}>{movie.title}</div>
            <div className={styles.detail__index}>{movie.year} · {genre} · {movie.language} · ★ {movie.rating}</div>
            <img className={styles.detail__img} src={movie.large_cover_image} alt={movie.title} />
            <div>
                <div>Runtime : {movie.runtime} min</div>
                <br/>
                <div className={styles.detail__description}>{desc}</div>
            </div>
        </div>
    );
}

export default Detail;