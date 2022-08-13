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
          {list.map((item) => (
            <>
              <li key={item.id}>{item.name}</li>
              <img src={item.product_image} alt={item.name} />
            </>
          ))}
        </ul>
      </div>
    </>
  );
};

export default Exemple;
