import React from "react";
import ShoppingCartIcon from "@mui/icons-material/ShoppingCart";
import Button from "@mui/material/Button";
// or
const HeaderSite = ({ name }) => {
  return (
    <div>
      <ul>
        <h1>{name}</h1>
        <div>
          <ShoppingCartIcon sx={{ color: "blue" }}></ShoppingCartIcon>
        </div>
        <Button variant="contained">Contained</Button>
      </ul>
    </div>
  );
};

export default HeaderSite;
