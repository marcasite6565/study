import PropTypes from "prop-types";
import {Link} from "react-router-dom";
import styles from "./movie.module.css";

function Movie({id, coverImg, title, year, lang, rating}) {
    return (
        <div className={styles.movie}>
            <Link to={`/react-movie-app/Movie/${id}`}>
                <div>
                    <img className={styles.movie__coverimg} src={coverImg} alt={title} />
                    <div className={styles.movie__title}>
                        {title.length > 24 ? `${title.slice(0,26)}...` : title}
                    </div>
                </div>
            </Link>
            <div className={styles.movie__desc}>
                {year} · {lang} · ★ {rating}
            </div>
        </div>
    );
};

Movie.propTypes = {
    id: PropTypes.number.isRequired,
    coverImg: PropTypes.string.isRequired,
    title: PropTypes.string.isRequired,
    year: PropTypes.number.isRequired,
    lang: PropTypes.string.isRequired,
    rating: PropTypes.number.isRequired
}

export default Movie;