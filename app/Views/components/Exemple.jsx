import React from "react";
import { useEffect, useState } from "react";
import axios from "axios";

const Exemple = () => {
  const [list, setList] = useState([]);
  useEffect(() => {
    axios
      .get("http://localhost:8080/api/")
      .then(function (response) {
        // handle success
        setList(response.data);
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      });
  }, []);

  return (
    <>
      <div>
        <h2>bonjour 2</h2>
        <ul>
          {list.map((item, i) => (
            <div key={i}>
              <li>{item.name}</li>
              <li>{item.cost}</li>
            </div>
          ))}
        </ul>
      </div>
    </>
  );
};

export default Exemple;
