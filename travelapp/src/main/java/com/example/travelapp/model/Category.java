package com.example.travelapp.model;

import com.fasterxml.jackson.annotation.JsonBackReference;
import com.fasterxml.jackson.annotation.JsonIgnore;
import com.fasterxml.jackson.annotation.JsonManagedReference;
import com.fasterxml.jackson.annotation.JsonValue;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.beans.factory.annotation.Autowired;

import javax.persistence.*;
import java.util.Date;
import java.util.HashSet;
import java.util.List;
import java.util.Set;


@Entity
@Table(name = "category")
@Data
@NoArgsConstructor
@AllArgsConstructor
public class Category {
    @Autowired
    @Id
    @GeneratedValue (strategy= GenerationType.IDENTITY)
    private Long id;
    private String name;
    private String content;
    private String image;
    private boolean status;
    @OneToMany
    @JoinColumn(name = "category_id")
    @JsonIgnore
    private List<TourEntity> tours;


}
