import { useEffect, useState } from "react";
import styles from "./loading.module.css";

function Loading() {
    const loadingtxt = "Loading...";
    const [text, setText] = useState("");
    const [index, setIndex] = useState(0);

    useEffect(() => {
        const interval = setInterval(() => {
            setText(text => text + loadingtxt[index]);
            setIndex(index => index+1);
        }, 300);
        if(index === loadingtxt.length){
            clearInterval(interval);
        }
        return () => clearInterval(interval);
    });

    return (
        <div className={styles.loading}>
            <div className={styles.loading__txt}>{text}</div>
        </div>
    );
}

export default Loading;