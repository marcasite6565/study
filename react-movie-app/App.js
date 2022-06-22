import Top from "./routes/top";
import New from "./routes/new";
import Header from "./components/header";
import Detail from "./routes/detail";
import Search from "./routes/search";
import {BrowserRouter as Router, Routes, Route, Navigate} from "react-router-dom";
import "./root.css";

function App() {
  return (
    <div>
      <Router>
        <Header />
        <Routes>
          <Route path="/react-movie-app/movie/:id" element={<Detail />} />
          <Route path="/react-movie-app/top" element={<Top />} />
          <Route path="/react-movie-app/new" element={<New />} />
          <Route path="/react-movie-app/search/:txt" element={<Search />} />
          <Route path="/react-movie-app/" element={<Navigate replace to="/react-movie-app/top" />}/>
        </Routes>
      </Router>
    </div>
  );
}

export default App;

/*
강의 들었던 것을 바탕으로 보강한 코드입니다.
강의 링크 : https://nomadcoders.co/react-for-beginners/
*/
