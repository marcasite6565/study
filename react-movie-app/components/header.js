import {Link, useNavigate} from "react-router-dom";
import styles from "./header.module.css";

function Header() {
  let navigate = useNavigate();

  const enterDown = (event) => {
    if(event.key === 'Enter'){
      navigate(`/react-movie-app/search/${event.target.value}`);
    }
  }

    return (
        <div className={styles.header}>
          <div className={styles.header__txt}>
            <div><Link to="/react-movie-app/top">TOP</Link></div>
            <div><Link to="/react-movie-app/new">NEW</Link></div>
            <input className={styles.header__search} type="text" placeholder="SEARCH" onKeyDown={enterDown}/>
          </div>
        </div>
    );
}

export default Header;