package com.example.travelapp.model;

import com.fasterxml.jackson.annotation.JsonIgnore;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

import javax.persistence.*;
import java.util.Date;
import java.util.List;

@Entity
@Table(name = "tour")
@Data
@NoArgsConstructor
@AllArgsConstructor
public class TourEntity {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    @Column(name = "title")
    private String title;
    @Column(name = "sub_title")
    private String subTitle;
    @Column(name = "image")
    private String image;
    @Column(name = "mota")
    private String describe;
    @Column(name = "interesting")
    private String interesting;
    @Column(name = "address")
    private String address;
    @Column(name = "inteval")
    private String inteval;
    @Column(name = "vehicle")
    private String vehicle;
    @Column(name = "day_start")
    private Date dayStart;
    @Column(name = "price")
    private Double price;
    @Column(name = "sale")
    private Double sale;
    @Column(name = "name_seller")
    private String nameSeller;
    @Column(name = "phone_contact")
    private String phoneContact;
    @Column(name = "status")
    private int status;
    @Column(name = "id_seller")
    private Long id_seller;
    @Column(name = "slot")
    private int slot;
    @ManyToOne
    @JoinColumn(name="category_id")
    private Category Category;

    @OneToMany
    @JoinColumn(name = "tour_id")
    @JsonIgnore
    private List<TourService> tourServices;

    @OneToMany(mappedBy="tour", cascade = CascadeType.ALL)
    @JsonIgnore
    private List<Invoice> listInvoice;

    @OneToMany(mappedBy="tour", cascade = CascadeType.ALL)
    @JsonIgnore
    private List<Rating> listRating;

}
