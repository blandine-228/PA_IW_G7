const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
  entry: './src/index.js', // Fichier JS principal de l'application
  output: {
    path: path.resolve(__dirname, 'dist'), // Dossier de sortie pour les fichiers générés
    filename: 'bundle.js', 
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: './src/index.html',
      filename: 'index.html', 
    }),
  ],
};