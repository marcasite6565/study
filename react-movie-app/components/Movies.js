import { useEffect, useState } from "react";
import Movie from "./movie";
import styles from "./movies.module.css";

function Movies({movies}) {
    return (
        <div className={styles.movies}>
            {movies.map(movie =>
                <Movie
                    key={movie.id}
                    id={movie.id}
                    coverImg={movie.large_cover_image}
                    title={movie.title}
                    year={movie.year}
                    lang={movie.language}
                    rating={movie.rating}
                />
            )}
        </div>
    );
};

export default Movies;